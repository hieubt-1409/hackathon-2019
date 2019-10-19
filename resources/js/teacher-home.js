Echo.channel('sessions')
    .listen('SessionCreated', (event) => {
        console.log(event);
    })
