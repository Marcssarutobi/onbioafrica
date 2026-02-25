import {
  deleteData,
  getData,
  getSingleData,
  postData,
  putData
} from "../../plugins/api";

/**
 * Récupérer tous les types de sponsors
 */
export async function allTypeSponsor() {
  return await getData('/allsponsortype').then(res => res.data);
}

/**
 * Récupérer un type de sponsor par ID
 */
export async function singleTypeSponsor(id) {
  return await getSingleData('/showsponsortype/' + id).then(res => res.data);
}

/**
 * Ajouter un type de sponsor
 */
export async function postTypeSponsor(data) {
  return await postData('/addsponsortype', data).then(res => res.data.data ?? res.data);
}

/**
 * Mettre à jour un type de sponsor
 */
export async function updateTypeSponsor(id, data) {
  return await putData('/updatesponsortype/' + id, data).then(res => res.data.data ?? res.data);
}

/**
 * Supprimer un type de sponsor
 */
export async function deleteTypeSponsor(id) {
  return await deleteData('/deletesponsortype/' + id).then(res => res.data);
}