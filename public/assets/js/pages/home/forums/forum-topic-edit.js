var blogPostBody = new Quill('#new-post-blog-body', {
    modules: {
        toolbar: [
            [{ header: [1, 2, 3, false] }],
            ['bold', 'italic', 'underline', 'strike', 'blockquote'],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            ['image', 'link','code-block']
        ]
    },
    placeholder: '...',
    theme: 'snow'
});

const newPostSendButton = document.getElementById('new-post-send');
if(newPostSendButton.addEventListener('click', quillToTextareaFrom)){

}

function quillToTextareaFrom(){
    const textarea = document.querySelector('textarea[name="description"]');
    if(textarea != null){
        textarea.innerHTML = document.querySelector('.ql-editor').innerHTML;
    }
}
