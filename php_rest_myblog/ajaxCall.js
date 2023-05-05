//POST REQUEST

$(document).ready(() => {
  $('#postMessage').click((e) => {
    e.preventDefault();

    //serialize form data
    const url = $('form').serialize();

    //function to turn url to an object
    const getUrlVars = (url) => {
      let hash;
      const myJson = {};
      const hashes = url.slice(url.indexOf('?') + 1).split('&');
      for (let i = 0; i < hashes.length; i++) {
        hash = hashes[i].split('=');
        myJson[hash[0]] = hash[1];
      }
      return JSON.stringify(myJson);
    };

    //pass serialized data to function
    const data = getUrlVars(url); 

    //post with ajax
    $.ajax({
      type: 'POST',
      url: 'api/post/create.php',
      data: data,
      ContentType: 'application/json',
      success: () => {
        alert('successfully posted');
      },
      error: () => {
        alert('Could not be posted');
      },
    });
  });
});

//GET REQUEST

$(document).ready(() => {
  $('#getMessage').click(() => {
    const req = new XMLHttpRequest();
    req.open('GET', 'api/post/read.php', true);
    req.send();

    req.onload = () => {
      const json = JSON.parse(req.responseText);

      let html = '';

      //loop and display data
      json.forEach((val) => {
        const keys = Object.keys(val);

        html += "<div class = 'cat'>";
        keys.forEach(
          (key) => (html += `<strong>${key}</strong>: ${val[key]} <br>`)
        );
        html += '</div><br>';
      });

      //append in message class
      $('.message')[0].innerHTML = html;
    };
  });
});
