ClassicEditor.create(document.querySelector("#isi"), {
    toolbar: {
        items: [
            '|',
            'heading',
            'bold',
            'italic',
            'link',
            'bulletedList',
            'numberedList',
            '|',
            'undo',
            'redo'
        ]
    },
    language: 'id',
    heading: {
        options: [{
            model: "paragraph",
            title: "Paragraph",
            class: "ck-heading_paragraph"
        },
        {
            model: "heading1",
            view: "h1",
            title: "Heading 1",
            class: "ck-heading_heading1"
        },
        {
            model: "heading2",
            view: "h2",
            title: "Heading 2",
            class: "ck-heading_heading2"
        }
        ]
    }
}).catch(error => {
    console.log(error);
});

function previewFile(input) {
    var file = $("#img").get(0).files[0];

    if (file) {
        var reader = new FileReader();

        reader.onload = function () {
            $("#new_img").show();
            $("#img_des").attr("src", reader.result);
            $("#img_des").show();
        }

        reader.readAsDataURL(file);
    }
}



