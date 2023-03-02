# Api For Disaster Prone Area

## Create Disaster Prone Area

+ Endpoint : ``/api/rawan/bencana``
+ HTTP Method : ``POST``
+ Request Body :

```json
{
    "nama_wilayah": "Parsoburan",
    "koordinat_lattitude": 2.3331,
    "koordinat_longitude": 99.0506,
    "jenis_rawan_bencana": "Tanah Longsor",
    "created_at": "2021-09-02",
    "updated_at": "2021-09-02",
    "created_by": {
        "id": 1,
        "full_name": "Jerry Andrianto Pangaribuan",
        "email": "jerryandrianto22@gmail.com",
        "address": "Perdagangan",
        "username": "jerry2204",
        "role": {
            "id": 1,
            "nama_role": "Bidang1"
        }
    }
}
```

+ Request Header :
    + Accept : ``application/json``
    +
  Authorization : ``Bearer 5|s7iH4izDXoIoiLJXUXvkTp7RdRkpdoAFYNhPqTWb``
+ Response Body (Success) :

```json
{
    "code": 201,
    "status": "created",
    "message": "Disaster Prone Area Created successfully",
    "data": {
        "id": 1,
        "nama_wilayah": "Parsoburan",
        "koordinat_lattitude": 2.3331,
        "koordinat_longitude": 99.0506,
        "jenis_rawan_bencana": "Tanah Longsor",
        "created_at": "2021-09-02",
        "updated_at": "2021-09-02",
        "created_by": {
            "id": 1,
            "full_name": "Jerry Andrianto Pangaribuan",
            "email": "jerryandrianto22@gmail.com",
            "address": "Perdagangan",
            "username": "jerry2204",
            "role": {
                "id": 1,
                "nama_role": "Bidang1"
            }
        }
    }
}
```

+ Response Body (Fail) :

```json
{
    "timestamp": "2021-05-14T04:22:26.690+0000",
    "code": 401,
    "status": "Unauthorized",
    "message": "Invalid Request: Invalid user authentication or invalid request format"
}
```

```json
{
    "timestamp": "2021-05-14T04:22:26.690+0000",
    "status": 400,
    "error": "Bad Request",
    "message": "Request field not valid"
}
```

```json
{
    "timestamp": "2021-05-14T04:22:26.690+0000",
    "status": 404,
    "error": "Not Found",
    "message": "User not found"
}
```

## Get All Prone Disaster Area

+ Endpoint       : ``/api/rawan/bencana``
+ HTTP Method    : ``GET``
+ Request Header :
    + Accept        : ``application/json``
    +
  Authorization : ``Bearer 5|s7iH4izDXoIoiLJXUXvkTp7RdRkpdoAFYNhPqTWbm``
+ Response Body (Success) :

```json
{
    "code": 200,
    "status": "OK",
    "count": 2,
    "data": [
        {
            "id": 1,
            "nama_wilayah": "Parsoburan",
            "koordinat_lattitude": 2.3331,
            "koordinat_longitude": 99.0506,
            "jenis_rawan_bencana": "Tanah Longsor",
            "created_at": "2021-09-02",
            "updated_at": "2021-09-02",
            "created_by": {
                "id": 1,
                "full_name": "Jerry Andrianto Pangaribuan",
                "email": "jerryandrianto22@gmail.com",
                "address": "Perdagangan",
                "username": "jerry2204",
                "role": {
                    "id": 1,
                    "nama_role": "Bidang1"
                }
            }
        },
        {
            "id": 2,
            "nama_wilayah": "Laguboti",
            "koordinat_lattitude": 2.4441,
            "koordinat_longitude": 98.0607,
            "jenis_rawan_bencana": "Banjir",
            "created_at": "2021-09-02",
            "updated_at": "2021-09-02",
            "created_by": {
                "id": 1,
                "full_name": "Jerry Andrianto Pangaribuan",
                "email": "jerryandrianto22@gmail.com",
                "address": "Perdagangan",
                "username": "jerry2204",
                "role": {
                    "id": 1,
                    "nama_role": "Bidang1"
                }
            }
        }
    ]
}
```

+ Response Body (Fail) :

```json
{
    "timestamp": "2021-05-14T04:22:26.690+0000",
    "code": 401,
    "status": "Unauthorized",
    "message": "Invalid Request: Invalid user authentication or invalid request format"
}
```

## Get Detail Disaster Prone Area

+ Endpoint : ``/api/rawan/bencana/{id}``
+ HTTP Method : ``GET``
+ Request Header :
    + Accept : ``application/json``
    +
  Authorization : ``Bearer 5|s7iH4izDXoIoiLJXUXvkTp7RdRkpdoAFYNhPqTWb``
+ Response Body (Success) :

```json
{
    "code": 200,
    "status": "OK",
    "data": {
        "id": 1,
            "nama_wilayah": "Parsoburan",
            "koordinat_lattitude": 2.3331,
            "koordinat_longitude": 99.0506,
            "jenis_rawan_bencana": "Tanah Longsor",
            "created_at": "2021-09-02",
            "updated_at": "2021-09-02",
            "created_by": {
                "id": 1,
                "full_name": "Jerry Andrianto Pangaribuan",
                "email": "jerryandrianto22@gmail.com",
                "address": "Perdagangan",
                "username": "jerry2204",
                "role": {
                    "id": 1,
                    "nama_role": "Bidang1"
                }
            }
    }
}
```

+ Response Body (Fail) :

```json
{
    "timestamp": "2021-05-14T04:22:26.690+0000",
    "code": 401,
    "status": "Unauthorized",
    "message": "Invalid Request: Invalid user authentication or invalid request format"
}
```

```json
{
    "timestamp": "2021-05-14T04:22:26.690+0000",
    "status": 404,
    "error": "Not Found",
    "message": "Disaster Prone Area Not Found"
}
```

## Edit Agenda

+ Endpoint : ``/api/rawan/bencana/{id}``
+ HTTP Method : ``PUT``
+ Request Body :

```json
{
    "nama_wilayah": "Parsoburan",
    "koordinat_lattitude": 2.3331,
    "koordinat_longitude": 99.0506,
    "jenis_rawan_bencana": "Gempa Bumi",
    "created_at": "2021-09-02",
    "updated_at": "2021-09-02",
    "created_by": {
        "id": 1,
        "full_name": "Jerry Andrianto Pangaribuan",
        "email": "jerryandrianto22@gmail.com",
        "address": "Perdagangan",
        "username": "jerry2204",
        "role": {
            "id": 1,
            "nama_role": "Bidang1"
        }
    }
}
```

+ Request Header :
    + Accept : ``application/json``
+ Response Body (Success) :

```json
{
    "code": 200,
    "status": "OK",
    "message": "Disaster Prone Area updated successfully",
    "data": {
        "id": 1,
            "nama_wilayah": "Parsoburan",
            "koordinat_lattitude": 2.3331,
            "koordinat_longitude": 99.0506,
            "jenis_rawan_bencana": "Tanah Longsor",
            "created_at": "2021-09-02",
            "updated_at": "2021-09-02",
            "created_by": {
                "id": 1,
                "full_name": "Jerry Andrianto Pangaribuan",
                "email": "jerryandrianto22@gmail.com",
                "address": "Perdagangan",
                "username": "jerry2204",
                "role": {
                    "id": 1,
                    "nama_role": "Bidang1"
                }
            }
    }
}
```

+ Response Body (Fail) :

```json
{
    "timestamp": "2021-05-14T04:22:26.690+0000",
    "code": 401,
    "status": "Unauthorized",
    "message": "Invalid Request: Invalid user authentication or invalid request format"
}
```

```json
{
    "timestamp": "2021-05-14T04:22:26.690+0000",
    "status": 400,
    "error": "Bad Request",
    "message": "Request field not valid"
}
```

## Delete Disaster Prone Area

+ Endpoint : ``/api/rawan/bencana/{id}``
+ HTTP Method : ``DELETE``
+ Request Header :
    + Accept : ``application/json``
+ Response Body (Success) :

```json
{
    "code": 200,
    "status": "OK",
    "message": "Disaster Prone Area deleted successfully"
}
```

+ Response Body (Fail) :

```json
{
    "timestamp": "2021-05-14T04:22:26.690+0000",
    "code": 401,
    "status": "Unauthorized",
    "message": "Invalid Request: Invalid user authentication or invalid request format"
}
```

```json
{
    "timestamp": "2021-05-14T04:22:26.690+0000",
    "status": 404,
    "error": "Not Found",
    "message": "Disaster Prone Area Not Found"
}
```
