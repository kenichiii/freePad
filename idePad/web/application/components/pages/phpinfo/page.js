



(function(window,$){


var pfcEditorPhpInfoPage = {
    pageid: 'phpinfo',
    title: 'phpinfo',
    config: {
        url: ''
    },
    
    init: function() {
           //set iframe holder height
        $('.phpinfor-iframe-holder').parent().css('margin','0').css('padding','0').css('padding-right','5px');
        var height = parseInt($("#pfc-editor-body").height()) - 18;
        $('.phpinfo-iframe-holder').css('height',height+"px"); 
        $(window).resize(function(){
            var height = parseInt($("#pfc-editor-body").height()) - 18;
            $('.phpinfo-iframe-holder').css('height',height+"px");             
        });
    }
    
    
}

$.pfcEditor.addPage('#pfc-editor-phpinfo-href',pfcEditorPhpInfoPage);


}(window,jQuery));