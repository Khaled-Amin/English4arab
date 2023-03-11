<script>
    const fpPromise = import('https://openfpcdn.io/fingerprintjs/v3')
            .then(FingerprintJS => FingerprintJS.load())
        fpPromise
            .then(fp => fp.get())
            .then(result => {
                // This is the visitor identifier:
                const visitorId = result.visitorId
                $.ajax({
                type: $(form).attr('method'),
                url: $(form).attr('action'),
                data: {
                    "_token": "{{ csrf_token() }}",
                    "visitor_id":visitorId,
                        },
                dataType: 'json'
            }).
            done(function(response) {
                
            });

        })
</script>