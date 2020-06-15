  //on load animations
window.addEventListener('load', function(){

  var h1title = document.getElementById("header1");
  var phrase = document.getElementById("catchPhrase");
  var button = document.getElementById("actionBTN");

  h1title.classList.add('leftIn');
  phrase.classList.add('rightIn');
  button.classList.add('bottomIn');


});

const options = {
  threshold: 0,
  rootMargin: "0px 0px 500px 0px"
};

const imgs = document.querySelectorAll("[data-src]");


const Observer = new IntersectionObserver((entries, Observer) => {

  entries.forEach(entry => {

    if(!entry.isIntersecting){
      return;
    } else{

      preloadImage(entry.target);
      entry.target.classList.add("leftIn");
      Observer.unobserve(entry.target);

    }

  });

}, options);

imgs.forEach(image => {
  Observer.observe(image);
});

/* register the service worker for passive web appllication */

  //if service worker exists in the browers navigation object
if('serviceWorker' in navigator){
  navigator.serviceWorker.register('/sw.js')
  .then( (reg) => console.log('service worker registered', reg) )
  .catch( (err) => console.log('service worker not registered', err) );
}



/* functions */
function preloadImage(img){
  const src = img.getAttribute("data-src");
  if(!src){
    return;
  } else{
    img.src = src;
  }
}
