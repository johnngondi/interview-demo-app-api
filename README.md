# Interview Demo App (Backend API)

This app will help you manage Tasks. It is built in Laravel.

See front-end here: [https://github.com/johnngondi/interview-demo-app-fe](https://github.com/johnngondi/interview-demo-app-fe)

## Project Setup

```sh
composer install
```

### Start Development server

```sh
php artisan serve
```

### Create first User
The project doesn't provide register endpoint. Create test User by running the `create-user` command.
```shell
php artisan app:create-user
```

## API Documentation

This is API documentation for the project.
Postman Collections & environment are included in the source code.

### Check if User is logged in

Send in a get request with Auth Token (Sanctum) in the Authorization header and the system will validate and return data object with user's name or error `401` if token is invalid

#### URL Endpoint

```shell
[GET]  v1/login-status
```

#### Success Response

```json
{
  "data": {
    "user": "John Ngondi"
  }
}
```

### Login User

Send in the email and password and the system will validate and return data object with user and token or `400` error if details are not valid

#### URL Endpoint

```shell
[POST]  v1/login
```

#### Payload

```json
 {
    "email": "john@ida.com",
    "password": "*****"
}
```

#### Success Response

```json
{
  "data": {
    "user": {},
    "token": "[AUTH_TOKEN]"
  }
}

```

### Logout User

Send in an empty payload with Auth Token (Sanctum) in the Authorization header the system will validate and log you out then return data object with null if token is valid or error `401` if token is invalid.

#### URL Endpoint

```shell
[POST]  v1/logout
```

#### Success Response

```json
{
  "data": null
}

```


### List Tasks

Send in a get request with Auth Token (Sanctum) in the Authorization header and the system will validate and return data object with tasks or error `401` if token is invalid

#### URL Endpoint

```shell
[GET]  v1/tasks
```

#### Success Response

```json
{
  "data": [
    {
      "id": 1,
      "title": "A sample task",
      "done": true
    },
    {
      "id": 2,
      "title": "Another sample task",
      "done": false
    }
  ]
}
```

### Mark Task as Done/Open

Send in the task done status (bool) with Auth Token (Sanctum) in the Authorization header the system will validate the data and create task then return data object with task if valid or error `401` if token is invalid, `422` id data is invalid and `500` in case of server error.

#### URL Endpoint

```shell
[PATCH]  v1/tasks/[:ID]
```

#### Payload

```json
  {
    "done": true
  }
```

#### Success Response

```json
{
  "data": {
    "id": 1,
    "title": "A sample task",
    "done": true
  }
}

```


### Delete Task

Send in a DELETE request with Auth Token (Sanctum) in the Authorization header, the system will validate the data and delete task then return data object with null if valid or error `401` if token is invalid and `500` in case of server error.

#### URL Endpoint

```shell
[DELETE]  v1/tasks/[:ID]
```

#### Success Response

```json
{
  "data": null
}

```

### Add Task

Send in the task title with Auth Token (Sanctum) in the Authorization header the system will validate the data and create task then return data object with task if valid or error `401` if token is invalid, `422` id data is invalid and `500` in case of server error.

#### URL Endpoint

```shell
[POST]  v1/tasks
```

#### Payload

```json
 {
    "title": "A sample task"
}
```

#### Success Response

```json
{
  "data": {
    "id": 1,
    "title": "A sample task",
    "done": false
  }
}

```

