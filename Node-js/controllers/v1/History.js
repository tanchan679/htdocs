const History_Model = require("../../db/model/history");
const commonFun = require("../CommonFunction");
const Const = require("../const");
const My_Controller = require("../My_Controller");

class History extends My_Controller{
    get(req, res) {
        var root_id = req.query.root_id;
        if (commonFun.empty(root_id)) {
            commonFun.result_json_error(res, 100);
        } else {
            History_Model.find({"root_id": root_id}, (err, rs) => {
                if (err) {
                    this.result_json_error(res);
                    throw err
                } else {
                    rs.forEach(item => {
                        item['data'] = JSON.parse(item['data']);
                    });

                    this.result_json(res, rs, "Thành công");
                }
            })
        }
    }
}

module.exports = new History();