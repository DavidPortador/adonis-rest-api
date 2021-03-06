'use strict'

const Proyecto = use('App/Models/Proyecto')
const AuthorizationService = use('App/Services/AuthorizationService')

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

    async update ({ auth, params, request }) {
        const user = await auth.getUser();
        const { id } = params;
        const proyecto = await Proyecto.find(id);
        AuthorizationService.verificarPermiso(proyecto, user);
        proyecto.merge(request.only('nombre'));
        await proyecto.save();
        return proyecto
    }

    async destroy({ auth, response, params }) {
        const user = await auth.getUser();
        const { id } = params;
        const proyecto = await Proyecto.find(id);
        AuthorizationService.verificarPermiso(proyecto, user);
        await proyecto.delete();
        return proyecto;
    }
}

module.exports = ProyectoController
