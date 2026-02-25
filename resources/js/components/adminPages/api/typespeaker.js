import {
  deleteData,
  getData,
  getSingleData,
  postData,
  putData
} from "../../plugins/api";

/* ==========================
   🔹 TypeSpeaker
========================== */

/**
 * Récupérer tous les types de speakers
 */
export async function allTypeSpeaker() {
  return await getData('/alltypespeaker').then(res => res.data);
}

/**
 * Récupérer un type de speaker par ID
 */
export async function singleTypeSpeaker(id) {
  return await getSingleData('/showtypespeaker/' + id).then(res => res.data);
}

/**
 * Ajouter un type de speaker
 */
export async function postTypeSpeaker(data) {
  return await postData('/addtypespeaker', data).then(res => res.data.data ?? res.data);
}

/**
 * Mettre à jour un type de speaker
 */
export async function updateTypeSpeaker(id, data) {
  return await putData('/updatetypespeaker/' + id, data).then(res => res.data.data ?? res.data);
}

/**
 * Supprimer un type de speaker
 */
export async function deleteTypeSpeaker(id) {
  return await deleteData('/deletetypespeaker/' + id).then(res => res.data);
}