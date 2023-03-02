# API for Authentication

## Register Admin
+ Endpoint : ``/api/auth/signup``
+ HTTP Method : ``POST``
+ Request Body :
```json
{
    "full_name"       : "Jerry Andrianto Pangaribuan",  
    "email"           : "jerryandrianto22@gmail.com",
    "address"         : "Perdagangan",
    "username"        : "jerryandriantop",
    "job"             : "General Manager",
    "password"        : "jerryandrianto22",
    "confirm_password": "jerryandrianto22"
}
```

+ Request Header :
    + Accept : ``application/json``
+ Response Body (Success) :

```json
{
    "code"     : 201,
    "status"   : "OK",
    "message"  : "User registered successfully",
    "count"    : 1,
    "data"     : [
        {
            "full_name": "Jerry Andrianto Pangaribuan",
            "email"    : "jerryandrianto22@gmail.com",
            "address"  : "Perdagangan",
            "username" : "jerryandriantop",
            "roles"    : [
                "ROLE_ADMIN",
                "ROLE_STAKE_HOLDER"
            ],
            "status"   : "0" 
        }
    ]
}
```

+ Response Body (Fail) :

```json
{
    "timestamp": "2021-05-14T04:22:26.690+0000",
    "code"     : 400,
    "status"   : "Bad Request",
    "message"  : "Invalid Request: Invalid user authentication or invalid request format"
}
```

```json
{
    "timestamp": "2021-05-14T04:22:26.690+0000",
    "status"   :  400,
    "error"    : "Bad Request",
    "message"  : "Email Address already in use!"
}
```

## Register Customer

+ Endpoint : ``/api/auth/signup/customer``
+ HTTP Method : ``POST``
+ Request Body :
```json
{
    "full_name"       : "Andree Panjaitan",  
    "email"           : "andree99@gmail.com",
    "address"         : "Porsea",
    "username"        : "andree99",
    "password"        : "andree99",
    "confirm_password": "andree99"
}
```

+ Request Header :
    + Accept : ``application/json``
+ Response Body (Success) :

```json
{
    "code"     : 201,
    "status"   : "Created Successfully",
    "message"  : "User registered successfully",
    "count"    : 1,
    "data"     : [
        {
            "full_name": "Andree Panjaitan",
            "email"    : "andree99@gmail.com",
            "address"  : "Porsea",
            "username" : "andree99",
            "role"     : "ROLE_CUSTOMER",
            "token"    : "eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJqYXZhaW51c2UiLCJleHAiOjE1NjY1NTE5ODksImlhdCI6MTU2NjUzMzk4OX0.Kvx2VZkmckMexnTwK8A3vHSDar3J-K-dCrkJ2jmQtKdAWbw1dAjJ34WXCQXs-WO23OQPTqVF36E1STEhGZFZfg"
        }
    ]
}
```

+ Response Body (Fail) :

```json
{
    "timestamp": "2021-05-14T04:22:26.690+0000",
    "code"   : 400,
    "status"    : "Bad Request",
    "message"  : "Email Address already in use!"
}
```

## Login

+ Endpoint : ``/api/auth/signin``
+ HTTP Method : ``POST``
+ Request Body :

```json
{
    "email"   : "jerryandrianto22@gmail.com",
    "password": "jerryandrianto22"
}
```

+ Request Header :
    + Accept : ``application/json``
+ Response Body (Success) :

```json
{
    "full_name": "Jerry Andrianto Pangaribuan",
    "role"     : "ROLE_ADMIN",
    "token"    : "eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJqYXZhaW51c2UiLCJleHAiOjE1NjY1NTE5ODksImlhdCI6MTU2NjUzMzk4OX0.Kvx2VZkmckMexnTwK8A3vHSDar3J-K-dCrkJ2jmQtKdAWbw1dAjJ34WXCQXs-WO23OQPTqVF36E1STEhGZFZfg"
}
```

+ Response Body (Fail) :

```json
{
    "timestamp": "2021-05-14T04:22:26.690+0000",
    "code"     : 400,
    "status"   : "Bad Request",
    "message"  : "Invalid Request: Invalid user authentication or invalid request format"
}
```

```json
{
    "timestamp": "2021-05-14T04:22:26.690+0000",
    "code"     : 401,
    "status"   : "Unauthorized",
    "message"  : "email or password is wrong"
}
```

## Logout
+ Endpoint : ``/api/auth/logout``
+ HTTP Method : ``DELETE``
+ Request Header :
    + Accept : ``application/json``
+ Response Body (Success) :

```json
{
    "code": 200,
    "status": "OK",
    "message": "Logout successfully"
}
```

