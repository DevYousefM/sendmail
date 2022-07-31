// Get Required Elements
let statusMSG = document.getElementById("statusMsg"),
  form = document.querySelector("form");

form.addEventListener("submit", (e) => {
  e.preventDefault();

  // Start Post http Request

  let xhr = new XMLHttpRequest();
  // Open Post http Request

  xhr.open("POST", "php/message.php", true);
  // Send Data On Post http Request
  let formData = new FormData(form);
  xhr.send(formData);

  xhr.onload = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let response = xhr.response;
      console.log(response);
      if (
        response.indexOf("Sorry, failed to send your message!") != -1 ||
        response.indexOf("Enter a valid email address!") != -1 ||
        response.indexOf("Email and message field is required!") != -1
      ) {
        statusMSG.style.color = "red";
      } else {
        form.reset();
        setTimeout(() => {
          statusMSG.style.display = "none";
        }, 3000);
      }
      statusMSG.innerText = response;
      form.classList.remove("disabled");
    }
  };
});
