import {
  deleteData,
  getData,
  getSingleData,
  postData,
  putData
} from "../../plugins/api";

/**
 * 🔹 Récupérer tous les abstracts
 */
export async function allAbstractData() {
  return await getData('/allabstractdata').then(res => {
    return res.data.data;
  });
}

/**
 * 🔹 Récupérer un abstract par ID
 */
export async function singleAbstractData(id) {
  return await getSingleData('/showabstractdata/' + id).then(res => {
    return res.data.data;
  });
}

/**
 * 🔹 Ajouter un abstract
 */
export async function postAbstractData(data) {
  return await postData('/addabstractdata', data).then(res => {
    return res.data.data ?? res.data;
  });
}

/**
 * 🔹 Mettre à jour un abstract
 */
export async function updateAbstractData(id, data) {
  return await putData('/updateabstractdata/' + id, data).then(res => {
    return res.data.data ?? res.data;
  });
}

/**
 * 🔹 Accepter un abstract
 */
export async function acceptAbstractData(id) {
  return await putData('/acceptabstractdata/' + id).then(res => {
    return res.data.data ?? res.data;
  });
}

/**
 * 🔹 Rejeter un abstract
 */
export async function rejectAbstractData(id) {
  return await putData('/rejectabstractdata/' + id).then(res => {
    return res.data.data ?? res.data;
  });
}

/**
 * 🔹 Marquer comme payé
 */
export async function markAbstractDataAsPaid(id) {
  return await putData('/markaspaidabstractdata/' + id).then(res => {
    return res.data.data ?? res.data;
  });
}

/**
 * 🔹 Marquer comme invité
 */
export async function markAbstractDataAsInvited(id) {
  return await putData('/markasinvitedabstractdata/' + id).then(res => {
    return res.data.data ?? res.data;
  });
}

/**
 * 🔹 Supprimer un abstract
 */
export async function deleteAbstractData(id) {
  return await deleteData('/deleteabstractdata/' + id).then(res => {
    return res.data.data;
  });
}