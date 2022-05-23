'use strict'

class ProyectoController {
    async index ({ auth }) {
        const user = await auth.getUser();
        //console.log(user); //user
        return await user.proyectos().fetch();
    }
}

module.exports = ProyectoController
