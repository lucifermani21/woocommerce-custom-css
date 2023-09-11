/* Custom Admin Script Codes */
(function ($) {
    var codeMirror = CodeMirror.fromTextArea(document.querySelector(".codemirror_text"), {
        'mode': 'htmlmixed',
        'lineNumbers': true,
        'lineWrapping': true,
        'indentUnit': 0,
        'cm-tab-extra-space-remove': true,					
    });
    console.log(codeMirror);
    codeMirror.focus();
})(jQuery);
