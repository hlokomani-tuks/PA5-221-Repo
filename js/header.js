function logout() {
    fetch("http://localhost/logout.php").then(() => {
        window.location.reload()
    })
}