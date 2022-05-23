'use strict'

const User = use('App/Models/User');

class UserController {
    store({ request }) {
        const { email, password } = request.all();
        console.log(email, password); // CONSOLE
        const user = User.create({
            email,
            password,
            username: email
        });
        return user;
    };
}

module.exports = UserController
