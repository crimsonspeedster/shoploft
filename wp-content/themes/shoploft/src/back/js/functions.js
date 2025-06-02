export function setCookie(name, value, days) {
    const date = new Date();

    date.setTime(date.getTime() + (days*24*60*60*1000));

    document.cookie = `${name}=${value}; expires=${date.toUTCString()}; path=/`;
}

export function getCookie(name) {
    const match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));

    return match ? match[2] : null;
}