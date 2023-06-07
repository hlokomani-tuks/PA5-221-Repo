function logout() {
    fetch("http://localhost/PA5-221-Repo/logout.php").then(() => {
        window.location.reload()
    })
}