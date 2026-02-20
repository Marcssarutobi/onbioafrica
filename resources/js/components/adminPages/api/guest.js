import {
  deleteData,
  getData,
  getSingleData,
  postData,
  putData
} from "../../plugins/api";

/**
 * 🔹 Récupérer tous les invités
 */
export async function allGuests() {
  return await getData('/allguest').then(res => {
    return res.data.data;
  });
}

/**
 * 🔹 Récupérer un invité par ID
 */
export async function singleGuest(id) {
  return await getSingleData('/showguest/' + id).then(res => {
    return res.data.data;
  });
}

/**
 * 🔹 Récupérer les invités par statut de présence
 * status : present | absent | pending (selon backend)
 */
export async function guestsByPresence(status) {
  return await getData('/showpresenceguest/' + status).then(res => {
    return res.data.data;
  });
}

/**
 * 🔹 Ajouter un invité
 */
export async function postGuest(data) {
  return await postData('/addguest', data).then(res => {
    return res.data.data ?? res.data;
  });
}

/**
 * 🔹 Mettre à jour un invité
 */
export async function updateGuest(id, data) {
  return await putData('/updateguest/' + id, data).then(res => {
    return res.data.data ?? res.data;
  });
}

/**
 * 🔹 Marquer présence / absence
 */
export async function toggleGuestPresence(id) {
  return await putData('/updateguestpresence/' + id).then(res => {
    return res.data.data ?? res.data;
  });
}

/**
 * 🔹 Supprimer un invité
 */
export async function deleteGuest(id) {
  return await deleteData('/deleteguest/' + id).then(res => {
    return res.data.data;
  });
}