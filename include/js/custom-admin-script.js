/* Custom Admin Script Codes */
(function ($) {
    let forminptextarea =  document.querySelectorAll( 'textarea' );
    forminptextarea.forEach((item) => {
        if (item.className === 'codemirror_text') {
            var codeMirror = CodeMirror.fromTextArea( item, {
                'mode': 'htmlmixed',
                'lineNumbers': true,
                'lineWrapping': true,
            });
            codeMirror.focus();
        }
    })    
})(jQuery);
