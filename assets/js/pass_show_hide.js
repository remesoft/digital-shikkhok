function togglePassword(target_id) {


        const password = document.querySelector(`#${target_id}`);
        const type = password.getAttribute("type") == "password" ? "text" : "password";
        password.setAttribute("type", type);
    };