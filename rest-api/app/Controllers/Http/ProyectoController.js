'use strict'

const Proyecto = use('App/Models/Proyecto')

class ProyectoController {
    async index ({ auth }) {
        const user = await auth.getUser();
        //console.log(user); //user
        return await user.proyectos().fetch();
    }

    async create ({ auth, request }) {
        const user = await auth.getUser();
        const { nombre } = request.all();
        const proyecto = new Proyecto();
        proyecto.fill({
            nombre
        });
        await user.proyectos().save(proyecto);
        return proyecto;
    }

    async destroy({ auth, response, params }) {
        const user = await auth.getUser();
        const { id } = params;
        const proyecto = await Proyecto.find(id);
        if (proyecto.user_id !== user.id){
            return response.status(403).json({
                mensaje: "Error 403: No puedes eliminar el registro porque no eres dueño"
            })
        }
        await proyecto.delete();
        return proyecto;
    }
}

module.exports = ProyectoController
