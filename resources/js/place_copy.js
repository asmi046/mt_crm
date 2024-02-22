document.addEventListener("DOMContentLoaded", () => {
    let all_copy = document.querySelectorAll(".place_copy")

    for (let i = 0; i < all_copy.length; i++)
        all_copy[i].addEventListener("click", function (e) {
            e.preventDefault()
            let elements_id = all_copy[i].dataset.placeid

            localStorage.setItem("bufer_f", document.getElementById("place_f_"+elements_id).value)
            localStorage.setItem("bufer_i", document.getElementById("place_i_"+elements_id).value)
            localStorage.setItem("bufer_o", document.getElementById("place_o_"+elements_id).value)
            localStorage.setItem("bufer_phone", document.getElementById("place_phone_"+elements_id).value)
            localStorage.setItem("bufer_comment", document.getElementById("place_comment_"+elements_id).value)

        });

    let all_paste = document.querySelectorAll(".place_paste")

    for (let i = 0; i < all_paste.length; i++)
        all_paste[i].addEventListener("click", function (e) {
            e.preventDefault()
            let elements_id = all_paste[i].dataset.placeid

            document.getElementById("place_f_"+elements_id).value = localStorage.getItem("bufer_f")
            document.getElementById("place_i_"+elements_id).value = localStorage.getItem("bufer_i")
            document.getElementById("place_o_"+elements_id).value = localStorage.getItem("bufer_o")
            document.getElementById("place_phone_"+elements_id).value = localStorage.getItem("bufer_phone")
            document.getElementById("place_comment_"+elements_id).value = localStorage.getItem("bufer_comment")
        });
});
