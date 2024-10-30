export async function load({ cookies }) {
    let auth_token = cookies.get('auth_token');
    // let marca = Marca.get(2);

    return { auth_token };
    // return { marca };
}