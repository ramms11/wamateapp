! function(t) {
    t.fn.disableOnSubmit = function(i) {
        var a = t.extend({
            duration: 4e3,
            buttonTemplate: '<span class="fa fa-fw fa-spinner fa-spin"></span>',
            submitInputText: "Please Wait..."
        }, i);

        function e(i) {
            var e = t(this),
                s = t(this).data("disable-on-submit");
            if (!1 !== s)
                if (!0 !== e.data("submitted")) {
                    e.data("submitted", !0);
                    var n = t("button:submit", this);
                    n.each(function() {
                        t(this).attr("disabled", "disabled"), !1 !== a.buttonTemplate && (t(this).data("temp-value", t(this).html()), t(this).html(a.buttonTemplate))
                    });
                    var u = t("input[type=submit]", this);
                    u.each(function() {
                        t(this).attr("disabled", "disabled"), !1 !== a.submitInputText && (t(this).data("temp-text", t(this).val()), t(this).val(a.submitInputText))
                    });
                    var d = a.duration;
                    if (s) {
                        var h = parseInt(s);
                        h > 0 && (d = h)
                    }
                    setTimeout(function() {
                        e.data("submitted", !1), n.each(function() {
                            t(this).removeAttr("disabled"), !1 !== a.buttonTemplate && t(this).html(t(this).data("temp-value"))
                        }), u.each(function() {
                            t(this).removeAttr("disabled"), !1 !== a.submitInputText && t(this).val(t(this).data("temp-text"))
                        })
                    }, d)
                } else i.preventDefault()
        }
        this.filter("form").each(function() {
            t(this).on("submit", e)
        })
    }
}(jQuery);