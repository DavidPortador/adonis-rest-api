'use strict'

const Proyecto = use('App/Models/Proyecto')
const Tarea = use('App/Models/Tarea')
const AuthorizationService = use('App/Services/AuthorizationService')

class TareaController {
    async create ({ auth, request, params }) {
        const user = await auth.getUser();
        const { description } = request.all();
        const { id } = params;
        const proyecto = await Proyecto.find(id);
        AuthorizationService.verificarPermiso(proyecto, user);
        const tarea = new Tarea();
        tarea.fill({
            description
        });
        await proyecto.tareas().save(tarea);
        return tarea;
    }

}

module.exports = TareaController
