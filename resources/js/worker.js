workbox.skipWaiting()
workbox.clientsClaim()

// fonts
workbox.routing.registerRoute(
    new RegExp('https://fonts.*'),
    workbox.strategies.cacheFirst({
        cacheName: 'fonts',
        plugins: [
            new workbox.cacheableResponse.Plugin({
                statuses: [0, 200]
            })
        ]
    })
)

// google stuff
workbox.routing.registerRoute(
    new RegExp('.*(?:googleapis|gstatic).com.*$'),
    workbox.strategies.networkFirst({
        cacheName: 'google'
    })
)

// static
workbox.routing.registerRoute(
    new RegExp('.(?:js|css|ico)$'),
    workbox.strategies.networkFirst({
        cacheName: 'static'
    }),
)

// images
workbox.routing.registerRoute(
    new RegExp('.(?:png|gif|jpg|jpeg|svg)$'),
    workbox.strategies.cacheFirst({
        cacheName: 'images',
        plugins: [
            new workbox.expiration.Plugin({
                maxEntries: 20,
                purgeOnQuotaError: true,
            })
        ]
    })
)

// pre-cache pages
workbox.precaching.precacheAndRoute([{
    url: 'offline.html',
    revision: Date.now()
}])

/**
* save pages to cache on visit & serve when offline
* or if not cached then serve the "offline view"
*/
const customHandler = async (args) => {
    try {
        return await workbox.strategies.networkFirst({
            cacheName: 'pages',
            plugins: [
                new workbox.expiration.Plugin({
                    maxEntries: 20,
                    purgeOnQuotaError: true
                })
            ]
        }).handle(args) || caches.match('offline.html')
    } catch (error) {
        return caches.match('offline.html')
    }
}

// dont cache this urls
const navigationRoute = new workbox.routing.NavigationRoute(customHandler, {
    blacklist: [
        new RegExp('/(login|register|password|auth)'),
        new RegExp('/(_admin|admin|myadmin|backoffice)')
    ]
})

workbox.routing.registerRoute(navigationRoute)
