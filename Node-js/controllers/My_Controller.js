const Const = require("../controllers/const");

class My_Controller {
    constructor(){

    }

    const_errorCcode(error_code = 0) {
        var err = {
            0: "Lỗi chưa xác định",
            100: "Lỗi id trống",
        };

        return err[error_code] ?? "Lỗi chưa xác định";
    }

    result_json(res, data, message) {
        var rs = {
            'status': true,
            'message': message,
            'data': data
        };

        res.setHeader('Content-Type', 'application/json');
        res.end(JSON.stringify(rs));
    }

    result_json_error(res, error_code = 0, message = null) {
        if (!message) {
            message = const_errorCcode(error_code);
        }
        var rs = {
            "status": false,
            "message": message,
            "data": null,
            "error_code": error_code
        };

        res.setHeader('Content-Type', 'application/json');
        res.end(JSON.stringify(rs));
    }

    empty(param) {
        if (param == "" || param == null) return true;
        else return false;
    }

    getTypeDeviceByRootID(root_id) {
        if (root_id.includes(1)) {

        }
    }
}

module.exports = My_Controller;