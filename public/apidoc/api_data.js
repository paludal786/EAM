define({ "api": [
  {
    "type": "post",
    "url": "/api/desktop/add",
    "title": "Add Desktop",
    "name": "Add_Desktop",
    "group": "Desktop",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "uid_no",
            "description": "<p>unique number of product like model number .</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "sn_no",
            "description": "<p>Sr.No Of Product.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "company",
            "description": "<p>Name Of Company Mention on Product.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response",
          "content": "    HTTP/1.1 200 OK\n    {\n      {\n\t          \"uid_no\": \"001\",\n           \"sn_no\": \"123\",\n           \"company\": \"apple\",\n           \"updated_at\": \"2020-02-22 19:37:58\",\n           \"created_at\": \"2020-02-22 19:37:58\",\n           \"id\": 5\n      }\n    }",
          "type": "json"
        },
        {
          "title": "Validation-Error",
          "content": "HTTP/1.1 422 OK\n{\n      \"uid_no\": [\n          \"The uid no field is required.\"\n      ],\n      \"sn_no\": [\n          \"The sn no field is required.\"\n     ],\n      \"company\": [\n          \"The company field is required.\"\n      ]\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "apidoc/Desktop.js",
    "groupTitle": "Desktop"
  },
  {
    "type": "get",
    "url": "/api/desktops",
    "title": "List Desktop",
    "name": "Desktop_Lists",
    "group": "Desktop",
    "success": {
      "examples": [
        {
          "title": "Success-Response",
          "content": "HTTP/1.1 200 OK\n{\n     [\n            {\n                \"id\": 1,\n                \"uid_no\": \"3\",\n                \"sn_no\": \"123\",\n                \"company\": \"apple\",\n                \"created_at\": \"2019-10-12 18:41:01\",\n                \"updated_at\": \"2019-10-12 18:41:01\",\n                \"deleted_at\": null\n            },\n            {\n                \"id\": 2,\n                \"uid_no\": \"1\",\n                \"sn_no\": \"456\",\n                \"company\": \"apple003\",\n                \"created_at\": \"2019-10-12 18:41:01\",\n                \"updated_at\": \"2019-10-12 18:41:01\",\n                \"deleted_at\": null\n            },\n            {\n                \"id\": 3,\n                \"uid_no\": \"2\",\n                \"sn_no\": \"789\",\n                \"company\": \"apple786\",\n                \"created_at\": \"2019-10-12 18:41:01\",\n                \"updated_at\": \"2019-10-12 18:41:01\",\n                \"deleted_at\": null\n            },\n            {\n                \"id\": 4,\n                \"uid_no\": \"4\",\n                \"sn_no\": \"789896\",\n                \"company\": \"apple78678979\",\n                \"created_at\": \"2019-10-12 18:41:01\",\n                \"updated_at\": \"2019-10-12 18:41:01\",\n                \"deleted_at\": null\n            }\n     ]\n}",
          "type": "json"
        },
        {
          "title": "Validation-Error",
          "content": "HTTP/1.1 422 OK\n{\n   Must Be Post Method\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "apidoc/Desktop.js",
    "groupTitle": "Desktop"
  }
] });
