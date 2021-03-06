if (typeof RedactorPlugins === 'undefined') var RedactorPlugins = {};

RedactorPlugins.mymodal = {
    init: function()
    {
        this.buttonAdd('mymodal', 'My Modal', this.showMyModal);
    },
    showMyModal: function()
    {
        var callback = $.proxy(function()
        {
            this.selectionSave();
            $('#redactor_modal #mymodal-insert').click($.proxy(this.insertFromMyModal, this));

        }, this);

        // modal call
        this.modalInit('My Modal', '#mymodal', 500, callback);
    },
    insertFromMyModal: function(html)
    {
        this.selectionRestore();
        this.insertHtml($('#mymodal-textarea').val());
        this.modalClose();
    }
}