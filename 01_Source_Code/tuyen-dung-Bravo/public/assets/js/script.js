"use strict";

class Language {

    _parentElement = document.querySelector(".language-row");
    _addBtn = document.querySelector(".add-language");
    _removeBtn = document.querySelector(".remove-language");
    date = new Date();
    id = (Date.now() + "").slice(-5);
    _count = this._parentElement.childElementCount;
    constructor() {
        this._addBtn.addEventListener("click", this.render.bind(this));
        document.addEventListener("click", this.removeLanguage.bind(this));

    }
    render() {

        const itm = this._parentElement.firstChild.nextElementSibling;
        const cln = itm.cloneNode(true);
        this._parentElement.insertAdjacentElement("beforeend", cln);
        this._count++;
        $(document).find("span.invalid-feedback").remove();
        $(document).find(".is-invalid").removeClass("is-invalid");
    }
    removeLanguage(e) {
        if (this._count == 1) {
            return;
        }
        if (e.target.classList == "remove-language") {
            const el = e.target.closest(".row");
            el.remove();
            this._count--;
        }
    }
}
new Language();
