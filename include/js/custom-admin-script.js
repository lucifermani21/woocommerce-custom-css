/* Custom Admin Script Codes */
(function ($) {
    //let textarea_count = 0;
    //let forminptextarea =  document.querySelectorAll( '.forminp-textarea textarea' );
    //console.log(forminptextarea);
    var codeMirror = CodeMirror.fromTextArea(document.querySelector(".forminp-textarea textarea"), {
        'mode': 'htmlmixed',
        'lineNumbers': true,
        'lineWrapping': true,
        'indentUnit': 0,
        'cm-tab-extra-space-remove': true,					
    });
    //console.log(codeMirror);
    codeMirror.focus();
})(jQuery);
