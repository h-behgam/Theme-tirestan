/**
 *  Admins jQuery
 */
(function ( $ ) {

    /**
     *  DOM Ready
     */
    $(function () {


        /**
         *  Brand
         */

        // Brand
        $("#ts-search-brand-add").on('click', function () {
            var parent = $("#ts-search-brand-parent").val();
            var name   = $("#ts-search-brand-name").val();
            if (name) {
                $.post(tirestan.admin_ajax, {
                    action: "tsbrandadd",
                    _wpnonce: tirestan.nonce,
                    parent: parent,
                    name: name
                }, function (data, status) {
                    tsResponseHandler(data, status);
                });
            } else
                alert("لطفا نام دسته را وارد کنید");
        });

        // Input Change
        $("#ts-search-brand-oldName").on('change', function () {
            $("#ts-search-brand-newName").val($(this).val());
        });

        // Update Brand
        $("#ts-search-brand-edit").on('click', function () {
            var select_box = $("#ts-search-brand-oldName");
            var parent     = select_box.find(':selected').attr('data-parent');
            var old_name   = select_box.val();
            var new_name   = $("#ts-search-brand-newName").val();
            if (new_name && old_name) {
                $.post(tirestan.admin_ajax, {
                    action: "tsbrandupdate",
                    _wpnonce: tirestan.nonce,
                    parent: parent,
                    old_name: old_name,
                    new_name: new_name
                }, function (data, status) {
                    tsResponseHandler(data, status);
                });
            } else
                alert("لطفا نام جدید را وارد کنید");
        });

        // Delete Brand
        $("#ts-search-brand-remove").on('click', function () {
            var select_box  = $("#ts-search-brand-oldName");
            var parent      = select_box.find(':selected').attr('data-parent');
            var target_name = select_box.val();
            if (target_name) {
                $.post(tirestan.admin_ajax, {
                    action: "tsbranddelete",
                    _wpnonce: tirestan.nonce,
                    parent: parent,
                    target_name: target_name
                }, function (data, status) {
                    tsResponseHandler(data, status);
                });
            } else
                alert("لطفا یک برند یا مدل انتخاب کنید");

        });



        /**
         *  Year
         */

        // Add Year
        $("#ts-search-year-add").on('click', function () {
            var year = $("#ts-search-year-name").val();
            if (year) {
                if (parseInt(year)) {
                    year = parseInt(year);
                    $.post(tirestan.admin_ajax, {
                        action: "tsyearadd",
                        _wpnonce: tirestan.nonce,
                        year: year
                    }, function (data, status) {
                        tsResponseHandler(data, status);
                    });
                } else
                    alert("سال وارد شده صحیح نیست");
            } else
                alert("لطفا فیلد سال را وارد کنید.");
        });

        // Delete Year
        $("#ts-search-year-delete").on('click', function () {
            var years = [];
            // Collect Selected Years
            $(".ts-search-year-checkbox").each(function () {
                if ($(this).is(":checked")) {
                    years.push($(this).val());
                }
            });
            if (years) {
                $.post(tirestan.admin_ajax, {
                    action: "tsyeardelete",
                    _wpnonce: tirestan.nonce,
                    years: JSON.stringify(years)
                }, function (data, status) {
                    tsResponseHandler(data, status);
                });
            } else
                alert("لطفا حداقل یک سال تولید انتخاب کنید");
        });



        /**
         *  Category
         */

        // Add Category
        $("#ts-search-cat-add").on('click', function () {
            var model = $("#ts-search-cat-model").val();
            var years = [];
            var cats  = [];
            var type  = $("#ts-search-cat-type").val();
            var valid = true;
            $(".ts-search-cat-checkbox-year").each(function () {
                if ($(this).is(":checked"))
                    years.push($(this).val());
            });
            $(".ts-search-cat-checkbox-cat").each(function () {
                if ($(this).is(":checked"))
                    cats.push($(this).val());
            });
            // Check Values ...
            if (!model) {
                alert("لطفا مدل ماشین را انتخاب کنید!");
                valid = false;
            }
            if (!years) {
                alert("سال تولید را وارد کنید!");
                valid = false;
            }
            if (!cats) {
                alert("حداقل یک دسته بندی را انتخاب کنید!");
                valid = false;
            }
            if (valid) {
                $.post(tirestan.admin_ajax, {
                    action: "tscatadd",
                    _wpnonce: tirestan.nonce,
                    model: model,
                    years: JSON.stringify(years),
                    cats: JSON.stringify(cats),
                    type: type
                }, function (data, status) {
                    tsResponseHandler(data, status);
                });
            }
        });

        // Delete Category
        $("#ts-search-cat-delete").on('click', function () {

            var select = $("#ts-search-cat-parent");
            var option = select.find('option:selected');
            var brand  = option.data('brand');
            var model  = option.data('model');
            var year   = select.val();
            if (year) {
                var allow = confirm('آیا مطمئن هستید؟');
                if (allow) {
                    $.post(tirestan.admin_ajax, {
                        action: "tscatdelete",
                        _wpnonce: tirestan.nonce,
                        brand: brand,
                        model: model,
                        year: year
                    }, function (data, status) {
                        tsResponseHandler(data, status);
                    });
                }
            } else
                alert("لطفا یک سال تولیدی انتخاب کنید");

        });

    });

    function tsResponseHandler(data, status) {
        if (status === "success") {
            var result = JSON.parse(data);
            if (result['error'] == '0' && result['data'] == 'ok') {
                location.reload();
            } else {
                alert(result['message']);
            }
        } else
            alert("مشکلی در ارتباط با سرور رخ داد!");
    }

})( jQuery );