const staticCacheName = 'site-static-v1'; 
const dynamicCache = 'site-dynamic-v1';   

    //left off putting icons in assets array still not finished
const assets = [
    '/',
    '/index.html',
    '/style.css',
    '/javascript.js',
    '/animate.css',
    '/sw.js',
    '/images/backend.png',
    '/images/bg1.gif',
    '/images/BlaineYoungResume.pdf',
    '/images/unanimity.gif',
    '/images/frontend.png',
    '/images/github.png',
    '/images/linkedin.png',
    '/images/mailme.png',
    '/images/swiftFoods.gif',
    '/images/android-chrome-192x192.png',
    '/images/android-chrome-512x512.png',
    '/images/apple-touch-icon.png',
    '/images/favicon-16x16.png',
    '/images/favicon-32x32.png',
    '/images/favicon.ico',
    '/images/maskable_icon.png',
    'https://fonts.googleapis.com/css?family=Concert+One&display=swap',
    'https://fonts.googleapis.com/css?family=Space+Mono&display=swap',
    '/fallback.html'
    
];

    //cache size limit function
const limitCacheSize = (name, size) => {
    caches.open(name).then(cache => {
        cache.keys().then(keys => {
          if(keys.length > size){
             cache.delete(keys[0]).then(limitCacheSize(name, size)); 
          }  
        })
    })
};
    
    //install server worker
self.addEventListener('install', evt => {


        //wait to install until 
    evt.waitUntil(
            //create the cache then loop through each cache
        caches.open(staticCacheName).then(cache => {
            console.log('caching shell assets');
            cache.addAll(assets); //adds all the elements in the assets array to the cache name we declared
        })
    );

});

    //activate service worker
self.addEventListener('activate', evt => {

        //wait to activate until
    evt.waitUntil(
            //for each key in the keys array
        caches.keys().then(keys => {
            //console.log(keys);
            return Promise.all(keys
                .filter(key => key !== staticCacheName && key !== dynamicCache) //check if the key is or is not the same as both cache names
                .map(key => caches.delete(key))    //more keys that !== to a new array to be deleted
            )
        })
    );

});

    //fetch events
self.addEventListener('fetch', evt => {
    //fetch requests need two .then 

    evt.respondWith(
        caches.match(evt.request).then(cacheRes => {
            return cacheRes || fetch(evt.request).then(fetchRes => {
                return caches.open(dynamicCache).then(cache => {
                    cache.put(evt.request.url, fetchRes.clone());
                    limitCacheSize(dynamicCache, 15);
                    return fetchRes;
                })
            });
        }).catch(() => {
                if(evt.request.url.indexOf('.html') > -1 || evt.request.url.indexOf('.php') > -1){ 
                    return caches.match('/fallback.html');
                }
            })
    );

});