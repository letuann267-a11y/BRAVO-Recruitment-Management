function setErrors(errors) {
    $.each(errors, function (field_name, error) {
        let regex = /\.\d+$/
        if (regex.test(field_name)) {
            let match = field_name.split('.')
            let field = match[0]
            let index = match[1]
            
            let listInput =  $("[name^='" + field + "']")
            $(listInput[index]).addClass("is-invalid");
            $(listInput[index]).after(
                "<span class='invalid-feedback'>" + error[0] + "</span>"
            );
        } else {
            $("[name='" + field_name + "']").addClass("is-invalid");
            $("[name='" + field_name + "']").after(
                "<span class='invalid-feedback'>" + error[0] + "</span>"
            );
        }
    });

    $(".is-invalid").first().focus();
}

function clearErrorField() {
    $("input, select, textarea").on("change", function () {
        $(this).removeClass("is-invalid");
        $(this).siblings(".invalid-feedback").hide();
    });
}

function clearValidate() {
    $(document).find("span.invalid-feedback").remove();
    $(document).find(".is-invalid").removeClass("is-invalid");
}
