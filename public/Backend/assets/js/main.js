document.addEventListener('DOMContentLoaded',()=>{

   document.getElementById('delete-form').addEventListener('submit', function(e) {
    e.preventDefault()
    if (confirm('Voulez vous supprimer cette Product')) {
        let form = e.target;
        let url = form.getAttribute('action');

        fetch(url, {
            method: "delete",
            headers:{
                'X-CSRF-TOKEN': document.querySelector('meta[name = "csrf-token"]').getAttribute('content'),
            },
        })
        .then(response => response.json()) 
        .then (data => {
            alert(data.message)
            window.location.reload()
        })
        .catch(error=> {
            console.error('Une erreur  s\' est produt lors de la suppression:', error);
        })
    }
   })


})


new TomSelect('select[multiple]',{plugin:{remove_button}})