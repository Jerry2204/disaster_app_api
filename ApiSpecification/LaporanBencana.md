# Api For Disaster Report

## Create Disaster Report

+ Endpoint : ``/api/laporan/bencana``
+ HTTP Method : ``POST``
+ Request Body :

```json
{
    "jenis_bencana": "Banjir",
    "lokasi": "Jl. PI Del, No. 1, Sitoluama, Laguboti",
    "keterangan": "Banjir akibat selokan yang dipenuhi dengan sampah",
    "korban": {
        "meninggal": 23,
        "luka_berat": 100,
        "luka_ringan": 250,
        "hilang": 15
    },
    "kerusakan": {
        "nama_infrastruktur": "Rumah",
        "rusak_berat": 10,
        "rusak_ringan": 15,
    },
    "status_penanggulangan": {
        "tanggal": "2021-09-03",
        "petugas": "Timothy",
        "keterangan": "Sudah dilakukan evakuasi warga ke tempat pengungsian",
        "tindakan": [
            "Membagikan bantuan makanan dan air bersih kepada pengungsi",
            "Mengirimkan bantuan ke lokasi bencana"
        ]
    },
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
            "nama_role": "masyarakat"
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
    "message": "Disaster Report Created successfully",
    "data": {
        "id_laporan": "BD001",
        "jenis_bencana": "Banjir",
        "lokasi": "Jl. PI Del, No. 1, Sitoluama, Laguboti",
        "keterangan": "Banjir akibat selokan yang dipenuhi dengan sampah",
        "korban": {
            "meninggal": 23,
            "luka_berat": 100,
            "luka_ringan": 250,
            "hilang": 15
        },
        "kerusakan": {
            "nama_infrastruktur": "Rumah",
            "rusak_berat": 10,
            "rusak_ringan": 15,
        },
        "status_penanggulangan": {
            "tanggal": "2021-09-03",
            "petugas": "Timothy",
            "keterangan": "Sudah dilakukan evakuasi warga ke tempat pengungsian",
            "tindakan": [
                "Membagikan bantuan makanan dan air bersih kepada pengungsi",
                "Mengirimkan bantuan ke lokasi bencana"
            ]
        },
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
                "nama_role": "masyarakat"
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

## Get All Disaster Report

+ Endpoint       : ``/api/laporan/bencana``
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
            "id_laporan": "BD001",
            "jenis_bencana": "Banjir",
            "lokasi": "Jl. PI Del, No. 1, Sitoluama, Laguboti",
            "keterangan": "Banjir akibat selokan yang dipenuhi dengan sampah",
            "korban": {
                "meninggal": 23,
                "luka_berat": 100,
                "luka_ringan": 250,
                "hilang": 15
            },
            "kerusakan": {
                "nama_infrastruktur": "Rumah",
                "rusak_berat": 10,
                "rusak_ringan": 15,
            },
            "status_penanggulangan": {
                "tanggal": "2021-09-03",
                "petugas": "Timothy",
                "keterangan": "Sudah dilakukan evakuasi warga ke tempat pengungsian",
                "tindakan": [
                    "Membagikan bantuan makanan dan air bersih kepada pengungsi",
                    "Mengirimkan bantuan ke lokasi bencana"
                ]
            },
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
                    "nama_role": "masyarakat"
                }
            }
        },
        {
            "id_laporan": "BD002",
            "jenis_bencana": "Kebakaran Rumah",
            "lokasi": "Jl. PI Del, No. 1, Sitoluama, Laguboti",
            "keterangan": "kebakaran rumah yang sudah menghabiskan banyak rumah",
            "korban": {
                "meninggal": 0,
                "luka_berat": 1,
                "luka_ringan": 2,
                "hilang": 0
            },
            "kerusakan": {
                "nama_infrastruktur": "Rumah",
                "rusak_berat": 10,
                "rusak_ringan": 1,
            },
            "status_penanggulangan": {
                "tanggal": "2021-09-03",
                "petugas": "Timothy",
                "keterangan": "Sudah dilakukan evakuasi warga ke tempat pengungsian",
                "tindakan": [
                    "Membagikan bantuan makanan dan air bersih kepada pengungsi",
                    "Mengirimkan bantuan ke lokasi bencana"
                ]
            },
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
                    "nama_role": "masyarakat"
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

## Get Detail Disaster Report

+ Endpoint : ``/api/laporan/bencana/{id}``
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
        "id_laporan": "BD001",
        "jenis_bencana": "Banjir",
        "lokasi": "Jl. PI Del, No. 1, Sitoluama, Laguboti",
        "keterangan": "Banjir akibat selokan yang dipenuhi dengan sampah",
        "korban": {
            "meninggal": 23,
            "luka_berat": 100,
            "luka_ringan": 250,
            "hilang": 15
        },
        "kerusakan": {
            "nama_infrastruktur": "Rumah",
            "rusak_berat": 10,
            "rusak_ringan": 15,
        },
        "status_penanggulangan": {
            "tanggal": "2021-09-03",
            "petugas": "Timothy",
            "keterangan": "Sudah dilakukan evakuasi warga ke tempat pengungsian",
            "tindakan": [
                "Membagikan bantuan makanan dan air bersih kepada pengungsi",
                "Mengirimkan bantuan ke lokasi bencana"
            ]
        },
        "created_at": "2021-09-02",
        "updated_at": "2021-09-02",
        "created_by": {
            "id": 1,
            "full_name": "Jerry Andrianto Pangaribuan",
            "email": "jerryandrianto22@gmail.com",
            "address": "Perdagangan",
            "username": "jerry2204",
            "role": {
                "id": 2,
                "nama_role": "masyarakat"
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
    "message": "Disaster Report Not Found"
}
```

## Edit Disaster Report

+ Endpoint : ``/api/laporan/bencana/{id}``
+ HTTP Method : ``PUT``
+ Request Body :

```json
{
    "id_laporan": "BD001",
    "jenis_bencana": "Banjir",
    "lokasi": "Jl. PI Del, No. 1, Sitoluama, Laguboti",
    "keterangan": "Banjir akibat seharian hujan tanpa henti",
    "korban": {
        "meninggal": 0,
        "luka_berat": 0,
        "luka_ringan": 0,
        "hilang": 1
    },
    "kerusakan": {
        "nama_infrastruktur": "Rumah",
        "rusak_berat": 10,
        "rusak_ringan": 15,
    },
    "status_penanggulangan": {
        "tanggal": "2021-09-03",
        "petugas": "Timothy",
        "keterangan": "Sudah dilakukan evakuasi warga ke tempat pengungsian",
        "tindakan": [
            "Membagikan bantuan makanan dan air bersih kepada pengungsi",
            "Mengirimkan bantuan ke lokasi bencana"
        ]
    },
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
    "message": "Disaster Report updated successfully",
    "data": {
        "id_laporan": "BD001",
        "jenis_bencana": "Banjir",
        "lokasi": "Jl. PI Del, No. 1, Sitoluama, Laguboti",
        "keterangan": "Banjir akibat seharian hujan tanpa henti",
        "korban": {
            "meninggal": 0,
            "luka_berat": 0,
            "luka_ringan": 0,
            "hilang": 1
        },
        "kerusakan": {
            "nama_infrastruktur": "Rumah",
            "rusak_berat": 10,
            "rusak_ringan": 15,
        },
        "status_penanggulangan": {
            "tanggal": "2021-09-03",
            "petugas": "Timothy",
            "keterangan": "Sudah dilakukan evakuasi warga ke tempat pengungsian",
            "tindakan": [
                "Membagikan bantuan makanan dan air bersih kepada pengungsi",
                "Mengirimkan bantuan ke lokasi bencana"
            ]
        },
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

## Delete Disaster Report

+ Endpoint : ``/api/rawan/bencana/{id}``
+ HTTP Method : ``DELETE``
+ Request Header :
    + Accept : ``application/json``
+ Response Body (Success) :

```json
{
    "code": 200,
    "status": "OK",
    "message": "Disaster Report deleted successfully"
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
    "message": "Disaster Report Not Found"
}
```
