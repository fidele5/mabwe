Dropzone.options.dpzSingleFile = {
        paramName: "file",
        maxFiles: 1,
        init: function() {
            this.on("maxfilesexceeded", function(e) {
                this.removeAllFiles(), this.addFile(e)
            })
        }
    },
    Dropzone.options.dpzMultipleFiles = {
        paramName: "file",
        maxFilesize: .5,
        clickable: !0
    },
    new Dropzone(document.body, {
        url: "{{ route('etudiants.upload')}}",
        previewsContainer: "#dpz-btn-select-files",
        clickable: "#select-files"
    }),
    Dropzone.options.dpzFileLimits = {
        paramName: "file",
        maxFilesize: .5,
        maxFiles: 5,
        maxThumbnailFilesize: 1
    }, Dropzone.options.dpAcceptFiles = {
        paramName: "file",
        maxFilesize: 1,
        acceptedFiles: "document/excel"
    }, Dropzone.options.dpzRemoveThumb = {
        paramName: "file",
        maxFilesize: 1,
        addRemoveLinks: !0,
        dictRemoveFile: " Trash"
    }, Dropzone.options.dpzRemoveAllThumb = {
        paramName: "file",
        maxFilesize: 1,
        init: function() {
            var e = this;
            $("#clear-dropzone").on("click", function() { e.removeAllFiles() })
        }
    };