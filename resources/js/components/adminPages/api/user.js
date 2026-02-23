import {
  deleteData,
  getData,
  getSingleData,
  postData,
  putData
} from "../../plugins/api";

/**
 * 🔹 Récupérer tous les utilisateurs
 */
export async function allUsers() {
  return await getData('/alluser').then(res => {
    return res.data.data;
  });
}

/**
 * 🔹 Récupérer un utilisateur par ID
 */
export async function singleUser(id) {
  return await getSingleData('/showuser/' + id).then(res => {
    return res.data.data;
  });
}

/**
 * 🔹 Ajouter un utilisateur
 */
export async function postUser(data) {
  return await postData('/adduser', data).then(res => {
    return res.data.data ?? res.data;
  });
}

/**
 * 🔹 Mettre à jour un utilisateur
 */
export async function updateUser(id, data) {
  return await putData('/updateuser/' + id, data).then(res => {
    return res.data.data ?? res.data;
  });
}

/**
 * 🔹 Supprimer un utilisateur
 */
export async function deleteUser(id) {
  return await deleteData('/deleteuser/' + id).then(res => {
    return res.data.data;
  });
}