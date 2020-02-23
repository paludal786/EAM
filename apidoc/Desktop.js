/**
 * @api {get} /api/desktops List Desktop
 * @apiName Desktop Lists
 * @apiGroup Desktop
 *
 *
 * @apiSuccessExample Success-Response
 *     HTTP/1.1 200 OK
 *     {
 *          [
                {
                    "id": 1,
                    "uid_no": "3",
                    "sn_no": "123",
                    "company": "apple",
                    "created_at": "2019-10-12 18:41:01",
                    "updated_at": "2019-10-12 18:41:01",
                    "deleted_at": null
                },
                {
                    "id": 2,
                    "uid_no": "1",
                    "sn_no": "456",
                    "company": "apple003",
                    "created_at": "2019-10-12 18:41:01",
                    "updated_at": "2019-10-12 18:41:01",
                    "deleted_at": null
                },
                {
                    "id": 3,
                    "uid_no": "2",
                    "sn_no": "789",
                    "company": "apple786",
                    "created_at": "2019-10-12 18:41:01",
                    "updated_at": "2019-10-12 18:41:01",
                    "deleted_at": null
                },
                {
                    "id": 4,
                    "uid_no": "4",
                    "sn_no": "789896",
                    "company": "apple78678979",
                    "created_at": "2019-10-12 18:41:01",
                    "updated_at": "2019-10-12 18:41:01",
                    "deleted_at": null
                }
 *          ]
 *     }
 *
 * @apiSuccessExample Validation-Error
 *     HTTP/1.1 422 OK
 *     {
 *        Must Be Post Method
 *     }
 *
 */

/**
 * @api {post} /api/desktop/add Add Desktop
 * @apiName Add Desktop
 * @apiGroup Desktop
 *
 *
 * @apiSuccess {Number} uid_no  unique number of product like model number .
 * @apiSuccess {Number} sn_no  Sr.No Of Product.
 * @apiSuccess {String} company  Name Of Company Mention on Product.
 *
 * @apiSuccessExample Success-Response
 *     HTTP/1.1 200 OK
 *     {
 *       {
 * 	          "uid_no": "001",
 *            "sn_no": "123",
 *            "company": "apple",
 *            "updated_at": "2020-02-22 19:37:58",
 *            "created_at": "2020-02-22 19:37:58",
 *            "id": 5
 *       }
 *     }
 *
 * @apiSuccessExample Validation-Error
 *     HTTP/1.1 422 OK
 *     {
 *           "uid_no": [
 *               "The uid no field is required."
 *           ],
 *           "sn_no": [
 *               "The sn no field is required."
 *          ],
 *           "company": [
 *               "The company field is required."
 *           ]
 *     }
 *
 */