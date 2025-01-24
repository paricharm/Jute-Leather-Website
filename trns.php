<style>
    .dynamic-select {
        display: flex;
        box-sizing: border-box;
        flex-direction: column;
        position: relative;
        width: 100%;
        user-select: none;
    }

    .dynamic-select .dynamic-select-header {
        border: 1px solid #dee2e6;
        padding: 7px 30px 7px 12px;
    }

    .dynamic-select .dynamic-select-header::after {
        content: "";
        display: block;
        position: absolute;
        top: 50%;
        right: 15px;
        transform: translateY(-50%);
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23949ba3' viewBox='0 0 16 16'%3E%3Cpath d='M8 13.1l-8-8 2.1-2.2 5.9 5.9 5.9-5.9 2.1 2.2z'/%3E%3C/svg%3E");
        height: 12px;
        width: 12px;
    }

    .dynamic-select .dynamic-select-header.dynamic-select-header-active {
        border-color: #c1c9d0;
    }

    .dynamic-select .dynamic-select-header.dynamic-select-header-active::after {
        transform: translateY(-50%) rotate(180deg);
    }

    .dynamic-select .dynamic-select-header.dynamic-select-header-active+.dynamic-select-options {
        display: flex;
    }

    .dynamic-select .dynamic-select-header .dynamic-select-header-placeholder {
        color: #65727e;
    }

    .dynamic-select .dynamic-select-options {
        display: none;
        box-sizing: border-box;
        flex-flow: wrap;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        z-index: 999;
        margin-top: 5px;
        padding: 5px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-height: 200px;
        overflow-y: auto;
        overflow-x: hidden;
    }

    .dynamic-select .dynamic-select-options::-webkit-scrollbar {
        width: 5px;
    }

    .dynamic-select .dynamic-select-options::-webkit-scrollbar-track {
        background: #f0f1f3;
    }

    .dynamic-select .dynamic-select-options::-webkit-scrollbar-thumb {
        background: #cdcfd1;
    }

    .dynamic-select .dynamic-select-options::-webkit-scrollbar-thumb:hover {
        background: #b2b6b9;
    }

    .dynamic-select .dynamic-select-options .dynamic-select-option {
        padding: 7px 12px;
    }

    .dynamic-select .dynamic-select-options .dynamic-select-option:hover,
    .dynamic-select .dynamic-select-options .dynamic-select-option:active {
        background-color: #f3f4f7;
    }

    .dynamic-select .dynamic-select-header,
    .dynamic-select .dynamic-select-option {
        display: flex;
        box-sizing: border-box;
        align-items: center;
        border-radius: 5px;
        cursor: pointer;
        display: flex;
        align-items: center;
        width: 100%;
        height: 45px;
        font-size: 16px;
        color: #212529;
    }

    .dynamic-select .dynamic-select-header img,
    .dynamic-select .dynamic-select-option img {
        object-fit: contain;
        max-height: 100%;
        max-width: 100%;
    }

    .dynamic-select .dynamic-select-header img.dynamic-size,
    .dynamic-select .dynamic-select-option img.dynamic-size {
        object-fit: fill;
        max-height: none;
        max-width: none;
    }

    .dynamic-select .dynamic-select-header img,
    .dynamic-select .dynamic-select-header svg,
    .dynamic-select .dynamic-select-header i,
    .dynamic-select .dynamic-select-header span,
    .dynamic-select .dynamic-select-option img,
    .dynamic-select .dynamic-select-option svg,
    .dynamic-select .dynamic-select-option i,
    .dynamic-select .dynamic-select-option span {
        box-sizing: border-box;
        margin-right: 10px;
        width: auto;
        border-radius: 0;
    }

    .dynamic-select .dynamic-select-header.dynamic-select-no-text,
    .dynamic-select .dynamic-select-option.dynamic-select-no-text {
        justify-content: center;
    }

    .dynamic-select .dynamic-select-header.dynamic-select-no-text img,
    .dynamic-select .dynamic-select-header.dynamic-select-no-text svg,
    .dynamic-select .dynamic-select-header.dynamic-select-no-text i,
    .dynamic-select .dynamic-select-header.dynamic-select-no-text span,
    .dynamic-select .dynamic-select-option.dynamic-select-no-text img,
    .dynamic-select .dynamic-select-option.dynamic-select-no-text svg,
    .dynamic-select .dynamic-select-option.dynamic-select-no-text i,
    .dynamic-select .dynamic-select-option.dynamic-select-no-text span {
        margin-right: 0;
    }

    .dynamic-select .dynamic-select-header .dynamic-select-option-text,
    .dynamic-select .dynamic-select-option .dynamic-select-option-text {
        box-sizing: border-box;
        flex: 1;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        color: inherit;
        font-size: inherit;
    }
</style>

<?php

$fetch =mysqli_query($con,"select * from lang");
$row = mysqli_fetch_assoc($fetch);
$text="";
if($row['lang_val'] == "0")
{
    $text.="English";
} elseif($row['lang_val'] == "1"){
    $text.="Bengali";
}else{
    $text.="Select Language";
}
?>
<li>
    <form>
        <select class="form-control lang" style="color:#812317" data-dynamic-select data-placeholder="<?= $text ?>">
        </select>
    </form>
</li>


<script>
    /*
     * Created by David Adams
     * https://codeshack.io/dynamic-select-images-html-javascript/
     * 
     * Released under the MIT license
     */
    class DynamicSelect {

        constructor(element, options = {}) {
            let defaults = {
                placeholder: 'Select an option',
                columns: 1,
                name: '',
                width: '',
                height: '',
                data: [],
                onChange: function() {}
            };
            this.options = Object.assign(defaults, options);
            this.selectElement = typeof element === 'string' ? document.querySelector(element) : element;
            for (const prop in this.selectElement.dataset) {
                if (this.options[prop] !== undefined) {
                    this.options[prop] = this.selectElement.dataset[prop];
                }
            }
            this.name = this.selectElement.getAttribute('name') ? this.selectElement.getAttribute('name') : 'dynamic-select-' + Math.floor(Math.random() * 1000000);
            if (!this.options.data.length) {
                let options = this.selectElement.querySelectorAll('option');
                for (let i = 0; i < options.length; i++) {
                    this.options.data.push({
                        value: options[i].value,
                        text: options[i].innerHTML,
                        img: options[i].getAttribute('data-img'),
                        selected: options[i].selected,
                        html: options[i].getAttribute('data-html'),
                        imgWidth: options[i].getAttribute('data-img-width'),
                        imgHeight: options[i].getAttribute('data-img-height')
                    });
                }
            }
            this.element = this._template();
            this.selectElement.replaceWith(this.element);
            this._updateSelected();
            this._eventHandlers();
        }

        _template() {
            let optionsHTML = '';
            for (let i = 0; i < this.data.length; i++) {
                let optionWidth = 100 / this.columns;
                let optionContent = '';
                if (this.data[i].html) {
                    optionContent = this.data[i].html;
                } else {
                    optionContent = `
                ${this.data[i].img ? `<img src="${this.data[i].img}" alt="${this.data[i].text}" class="${this.data[i].imgWidth && this.data[i].imgHeight ? 'dynamic-size' : ''}" style="${this.data[i].imgWidth ? 'width:' + this.data[i].imgWidth + ';' : ''}${this.data[i].imgHeight ? 'height:' + this.data[i].imgHeight + ';' : ''}">` : ''}
                ${this.data[i].text ? '<span class="dynamic-select-option-text">' + this.data[i].text + '</span>' : ''}
            `;
                }
                optionsHTML += `
            <div class="dynamic-select-option${this.data[i].value == this.selectedValue ? ' dynamic-select-selected' : ''}${this.data[i].text || this.data[i].html ? '' : ' dynamic-select-no-text'}" data-value="${this.data[i].value}" style="width:${optionWidth}%;${this.height ? 'height:' + this.height + ';' : ''}">
                ${optionContent}
            </div>
        `;
            }
            let template = `
        <div class="dynamic-select ${this.name}"${this.selectElement.id ? ' id="' + this.selectElement.id + '"' : ''} style="${this.width ? 'width:' + this.width + ';' : ''}${this.height ? 'height:' + this.height + ';' : ''}">
            <input type="hidden" name="${this.name}" value="${this.selectedValue}">
            <div class="dynamic-select-header" style="${this.width ? 'width:' + this.width + ';' : ''}${this.height ? 'height:' + this.height + ';' : ''}"><span class="dynamic-select-header-placeholder">${this.placeholder}</span></div>
            <div class="dynamic-select-options" style="${this.options.dropdownWidth ? 'width:' + this.options.dropdownWidth + ';' : ''}${this.options.dropdownHeight ? 'height:' + this.options.dropdownHeight + ';' : ''}">${optionsHTML}</div>
        </div>
    `;
            let element = document.createElement('div');
            element.innerHTML = template;
            return element;
        }

        _eventHandlers() {
            this.element.querySelectorAll('.dynamic-select-option').forEach(option => {
                option.onclick = () => {
                    this.element.querySelectorAll('.dynamic-select-selected').forEach(selected => selected.classList.remove('dynamic-select-selected'));
                    option.classList.add('dynamic-select-selected');
                    this.element.querySelector('.dynamic-select-header').innerHTML = option.innerHTML;
                    this.element.querySelector('input').value = option.getAttribute('data-value');
                    this.data.forEach(data => data.selected = false);
                    this.data.filter(data => data.value == option.getAttribute('data-value'))[0].selected = true;
                    this.element.querySelector('.dynamic-select-header').classList.remove('dynamic-select-header-active');
                    this.options.onChange(option.getAttribute('data-value'), option.querySelector('.dynamic-select-option-text') ? option.querySelector('.dynamic-select-option-text').innerHTML : '', option);
                };
            });
            this.element.querySelector('.dynamic-select-header').onclick = () => {
                this.element.querySelector('.dynamic-select-header').classList.toggle('dynamic-select-header-active');
            };
            if (this.selectElement.id && document.querySelector('label[for="' + this.selectElement.id + '"]')) {
                document.querySelector('label[for="' + this.selectElement.id + '"]').onclick = () => {
                    this.element.querySelector('.dynamic-select-header').classList.toggle('dynamic-select-header-active');
                };
            }
            document.addEventListener('click', event => {
                if (!event.target.closest('.' + this.name) && !event.target.closest('label[for="' + this.selectElement.id + '"]')) {
                    this.element.querySelector('.dynamic-select-header').classList.remove('dynamic-select-header-active');
                }
            });
        }

        _updateSelected() {
            if (this.selectedValue) {
                this.element.querySelector('.dynamic-select-header').innerHTML = this.element.querySelector('.dynamic-select-selected').innerHTML;
            }
        }

        get selectedValue() {
            let selected = this.data.filter(option => option.selected);
            selected = selected.length ? selected[0].value : '';
            return selected;
        }

        set data(value) {
            this.options.data = value;
        }

        get data() {
            return this.options.data;
        }

        set selectElement(value) {
            this.options.selectElement = value;
        }

        get selectElement() {
            return this.options.selectElement;
        }

        set element(value) {
            this.options.element = value;
        }

        get element() {
            return this.options.element;
        }

        set placeholder(value) {
            this.options.placeholder = value;
        }

        get placeholder() {
            return this.options.placeholder;
        }

        set columns(value) {
            this.options.columns = value;
        }

        get columns() {
            return this.options.columns;
        }

        set name(value) {
            this.options.name = value;
        }

        get name() {
            return this.options.name;
        }

        set width(value) {
            this.options.width = value;
        }

        get width() {
            return this.options.width;
        }

        set height(value) {
            this.options.height = value;
        }

        get height() {
            return this.options.height;
        }

    }
    document.querySelectorAll('[data-dynamic-select]').forEach(select => new DynamicSelect(select, {
        width: '180px',
        height: '35px',
        columns: 1,
        placeholder: 'Select an option',
        data: [{
                value: '0',
                text: 'English',
                img: 'assets/img/us.png'
            },
            {
                value: '1',
                text: 'Bangla',
                img: 'assets/img/bn.jpg'
            }
        ],
        onChange: function(value, text, option) {
            localStorage.setItem('language', value);
            window.location.reload()
        }
    }));
</script>