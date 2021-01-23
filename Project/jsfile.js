function buynowfn(event){
  const eleInteractedWith = event.target;
  const checkLink = eleInteractedWith.parentElement.querySelector('a#btn_submit');
  checkLink.click();
}


function cartfn(event){
  alert("bub");
  const eleInteractedWith = event.target;
  console.log('found', eleInteractedWith);
  console.log('found', eleInteractedWith.parentElement);
  const checkLink = eleInteractedWith.parentElement.querySelector('a.btn_cart');
  checkLink.click();
}


function favfn(event){
  const eleInteractedWith = event.target;
  const checkLink = eleInteractedWith.parentElement.querySelector('a#btn_fav');
  checkLink.click();
}

function check(){
  alert("uujb");
}
