document.getElementById('subscribeForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const email = document.getElementById('email').value;
    const webhookUrl = 'https://discord.com/api/webhooks/1261684500799422564/neiqxSD62nG8zuJRy_BOhrkWj9BqBzBRM8HYyiG4yac5CWPzaOpJnsGsmr3YQ8wsti_F'; // 不用想了，你們外部發送的不會回傳到頻道~~

    const request = new XMLHttpRequest();
    request.open("POST", webhookUrl);
    request.setRequestHeader('Content-type', 'application/json');

    const params = {
        content: `新的訂閱者: \`\`\`${email}\`\`\``
    };

    request.send(JSON.stringify(params));

    alert('訂閱成功！');
    document.getElementById('subscribeForm').reset();
});
