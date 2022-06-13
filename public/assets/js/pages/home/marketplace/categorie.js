const marketplaceCategories = document.querySelectorAll('input[name="marketplace-categorie"]');
for(let i = 0; i < marketplaceCategories.length; i++){
    marketplaceCategories[i].closest('.checkbox-wrap').addEventListener("click", changeCategorie);
}

function changeCategorie(){
    const slag = this.querySelector('input').getAttribute('data-slag');
    window.location.href = "/marketplace/"+slag;
}
