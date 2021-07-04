class AppStorage {

    storeToken(token) {
        localStorage.setItem('token', token);
    }

    storeUser(user) {
        localStorage.setItem('user', user);
    }

    storeId(user_id) {
        localStorage.setItem('user_id', user_id);
    }

    store(token, user, user_id) {
        this.storeToken(token)
        this.storeUser(user)
        this.storeId(user_id)
    }

    clear() {
        localStorage.removeItem('token')
        localStorage.removeItem('user')
        localStorage.removeItem('user_id')
        localStorage.clear()
    }

    getToken() {
        return localStorage.getItem('token');
    }

    getUser() {
        return localStorage.getItem('user');
    }

    getId() {
        return localStorage.getItem('user_id');
    }




}

export default AppStorage = new AppStorage();

// class AppStorage {
//     constructor() {
//         this._token = null;
//         this._name = null;
//         this._id = null;
//     }

//     setToken(token) {
//         this._token = token;
//     }

//     getToken() {
//         return this._token;
//     }

//     setName(name) {
//         this._name = name;
//     }

//     getName() {
//         return this._name;
//     }

//     setId(id) {
//         this._id = id;
//     }

//     getId() {
//         return this._id;
//     }

//     clear() {
//         this._token = null;
//         this._name = null;
//         this._id = null;
//     }

//     store(access_token, username, user_id) {
//         localStorage.setItem('token', access_token);
//         localStorage.setItem('user', username);
//         localStorage.setItem('id', user_id);
//     }
// }

// const instance = new AppStorage();
// Object.freeze(instance);

// export default instance;