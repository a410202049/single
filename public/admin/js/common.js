Date.prototype.Format = function (fmt) { //author: meizz 
    var fmt = fmt||"yyyy-MM-dd";
    var o = {
        "M+": this.getMonth() + 1, //月份 
        "d+": this.getDate(), //日 
        "h+": this.getHours(), //小时 
        "m+": this.getMinutes(), //分 
        "s+": this.getSeconds(), //秒 
        "q+": Math.floor((this.getMonth() + 3) / 3), //季度 
        "S": this.getMilliseconds() //毫秒 
    };
    if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
    for (var k in o)
    if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
    return fmt;
}
;var common = {
	init:function(){
		this.listnerBinder();
	},
    /*公用事件*/
    listnerBinder:function(){
        $(document).on('click','.btn-toggle',function(e){
            $(this).addClass('active').siblings('.btn-toggle').removeClass('active')
        });
        $(document).on('keyup', '.numberInput,.number-input', function(e) {
            var key=window.event?e.keyCode:e.which;
            if (key == 8 || key == 9 || key == 46 || key == 37 || key == 39 ) {
                return;
            }//释放方向键
            this.value = this.value.replace(/\D/g,'');
        });//数字输入
        $(document).on('click','.close-layer',function(){
            layer.closeAll();
        })
        $(document).on('keydown',function(e){
            if (e.keyCode==116) {
                e.preventDefault()
                if (self==top) {
                    if (document.querySelectorAll('iframe').length==0) {
                        window.location.reload();
                        return false;
                    }
                    var index = $(".J_menuTab.active").index()
                    var src = $('.J_mainContent iframe').eq(index).attr("src") 
                    $('.J_mainContent iframe').eq(index).attr("src",src);

                }else{
                    var index = $(parent.document.querySelector('.J_menuTab.active')).index();
                    var dom =  $(parent.document.querySelectorAll('.J_mainContent iframe')[index])
                    dom.attr("src",dom.attr("src"))
                }
            }
        });//F5事件
        $(document).on('click', '.btn-switcher', function(event) {
            $(this).toggleClass('active');
            /* Act on the event */
        });//开关按钮
        $(document).on('focus','.domain-input',function(){
            if ($(this).val()!="") return false;
            $(this).val("http://")
        })//域名输入
    },

	/*公用正则表达式*/
	commonReg: {
        email: /^([a-zA-Z0-9]+[_|\_|\.|-]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/,//邮件正则
        number: /^\d+$/,//数字正则
        phone: /^(13|14|15|18|17)[0-9]{9}$/,
        telphone:/^0\d{2,3}-?\d{8}$/,
        authCode: /^[0-9a-zA-Z]{4}$/,  //图形验证码
        phoneAuthCode: /^[0-9a-zA-Z]{6}$/,  //手机验证码
        pass: /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,20}$/,//密码正则
        name: /^[\u4E00-\u9FA5]{2,5}$/,//姓名正则
        identify: /^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/,//身份证正则
        bankCard: /^[0-9]{4,40}$/,//银行卡正则
        validTime: /^[1-9]\d{3}((0\d)|(1[0-2]))$/,
        safe: /[~#$￥ˇ<>（）\s\?\*\&\\\|\/\[\]\{\}\\^%]/,
        decimalLimit:/^\d+(?:\.\d{2})?$/,//两位小数
        negativeDecimalLimit:/^(-|\d)+(?:\.\d{2})?$/,//负数两位金额
        originFlowNo:/^[0-9]{22}[\-]{1}[0-9]{3}[\-]{1}[0-9]{2}$/
    },
    /*
    	检查是否匹配正则 参数 待检查的值 正则名
    	返回值 true||false
     */
    check: function(val, reg) {
        return this.commonReg[reg].test(val);
    },
    checkForm:function(selector){
        var dom = typeof(selector)=="string"?$(selector):selector
    },
    ajaxError:function(e){
        var error = e.message;
        if (!e.message) {
            switch (e.status) {
                case 200:
                    error = "200 No response"
                    break;
                case 404:
                    error = "404 Not Found"
                    break;
                case 500:
                    error = "500 Unexpected server error"
                    break;
                default:
                    error = e.status+" error,please try again."
                    break;
            }
        }
        layer.msg(error,{
            icon:2
        })
    },
    /**
     * [getAnalytic description]
     * @param  {[type]} option [description]
     * @return {[type]}        [description]
     */
    getMetrics:function(option,func){
        if (!option.hasOwnProperty("url")||option.url=="") {
            console.error("Url is required");
            return false;
        }
        var options = {
            metrics:["sessions"],
            range:"today",
        }
        if (option&&option.constructor==Object) {
            for(var prop in option){
                if (options.hasOwnProperty(prop)) {
                    options[prop] = option[prop];
                }
            }
        }        
        var data = {};
        $.extend(data,options);
        var now = new Date();
        switch(options.range){
            case "today":
                data.range = now.Format();
                break;
            case "yesterday":
                data.range = new Date(now.getTime() - (1000*60*60*24)).Format() + "/" + now.Format();
                break;
            case "this_week":
                data.range = new Date(now.getTime() - (now.getDay()-1)*(1000*60*60*24)).Format() + "/" + now.Format();
            default:
                data.range = option.range;
                break;    
        }
        var result;
        $.ajax({
            url: option.url,
            type: 'POST',
            dataType: 'json',
            data: data,
            async:true,
            beforeSend:function(){
                layer.load(2);
            }
        })
        .done(function(e) {
            if (e.status!=1) {
                common.ajaxError(e);
                return false;
            }    
            result = e.data;
            if (typeof(func)=="function"){
                func(result)
            }
        })
        .fail(function(e) {
           common.ajaxError(e);
           return false;
        })
        .always(function() {
           layer.closeAll("loading")
        })
        return result;
    },
    /**
     * [getChart description]
     * @param  {[type]} option [description]
     * @param  {[type]} func   [description]
     * @return {[type]}        [description]
     */
    getChart:function(option,func){
        if (!option.hasOwnProperty("url")||option.url=="") {
            console.error("Url is required");
            return false;
        }
        var options = {
            metrics:["sessions"],
            range:"today",
            dimensions:['nthDay'],
        }
        if (option&&option.constructor==Object) {
            for(var prop in option){
                    options[prop] = option[prop];
            }
        }        
        var data = {};
        $.extend(data,options);
        var now = new Date();
        switch(options.range){
            case "today":
                data.range = now.Format();
                break;
            case "yesterday":
                data.range = new Date(now.getTime() - (1000*60*60*24)).Format() + "/" + now.Format();
                break;
            case "this_week":
                data.range = new Date(now.getTime() - (now.getDay()-1)*(1000*60*60*24)).Format() + "/" + now.Format();
            default:
                data.range = option.range;
                break;    
        }
        var result;
        $.ajax({
            url: option.url,
            type: 'POST',
            dataType: 'json',
            data: data,
            async:true,
            beforeSend:function(){
                layer.load(2);
            }
        })
        .done(function(e) {
            if (e.status!=1) {
                common.ajaxError(e);
                return false;
            }    
            result = e.data;
            if (typeof(func)=="function"){
                func(result)
            }
        })
        .fail(function(e) {
           common.ajaxError(e);
           return false;
        })
        .always(function() {
           layer.closeAll("loading")
        })
        return result;       
    },
    /**
     * [getDate description]
     * @param  {number,string} date [description]
     * @param  {string} type [如果date是个数字，type必须传，ago,later]
     * @param  {[type]} func [description]
     * @return {[type]}      [description]
     */
    getDate:function(){
        var date = arguments[0]||"now";
        var now = new Date().getTime();
        var nowdays = new Date();
        var hasFunc = (typeof(arguments[1])=="function");
        if ((typeof(date)=="number")) {
            var type = hasFunc?"default":arguments[1]
                ,func = hasFunc?arguments[1]:arguments[arguments.length-1]
                ,result = (Number(date)*1000*3600*24)
            switch(type){
                case "ago":
                    result = (new Date(now-result)).Format()
                    break
                case "later":
                default :
                    result = (new Date(now+result)).Format()
                    break
            }
            if(typeof(func)=="function")func(result)
            return result
        }
        var date = (date!=""?date:"last-week"),
            result;           
        switch (date){
            case "now":
                result = (new Date()).Format()
                break
            case "today":
                result = [this.getDate(),this.getDate()]
                break;
            case "last-7-days":
                result = [this.getDate(-6),nowdays.Format()]
                break
            case "yesterday":
                result = [this.getDate(-1),this.getDate(-1)]
                break
            case "this-week":
                result=[(new Date(now-((nowdays.getDay()-1)*1000*3600*24))).Format(),nowdays.Format()]
                break;
            case "last-week":
                var prevDay =  new Date(now-(7000*3600*24));
                var startDay = prevDay.getTime()-((prevDay.getDay()-1)*1000*3600*24);
                result = [new Date(startDay).Format(),new Date(startDay+(6*1000*3600*24)).Format()]
                break;
            case "last-month": {
                var year = nowdays.getFullYear();
                var month = nowdays.getMonth();
                if(month==0)
                {
                    month=12;
                    year=year-1;
                }
                if (month < 10) {
                    month = "0" + month;
                }
                var myDate = new Date(year, month, 0);
                result=[(year + "-" + month + "-" + "01"),(year + "-" + month + "-" + myDate.getDate())]               
                break
            }
            case "this-month": {
                var year = nowdays.getFullYear();
                var month = nowdays.getMonth()+1;
                if (month < 10) {
                    month = "0" + month;
                }                
                var firstDay = year + "-" + month + "-" + "01";//这个月的第一天
                var myDate = new Date(year, month, 0);
                var lastDay = year + "-" + month + "-" + nowdays.getDate();//今天                
                $("#filter-date-range-start").val(firstDay);
                $("#filter-date-range-end").val(lastDay);
                result=[firstDay,lastDay]               
                break
            }
            default:
                result=false;
                console.warn("Invalid Date Range Argument Value: "+date)
                break                
        }
        var func = hasFunc?arguments[1]:arguments[arguments.length-1];
        if(typeof(func)=="function")func(result)
        return result;

    }
}
window.onload = function(){
	common.init();
}