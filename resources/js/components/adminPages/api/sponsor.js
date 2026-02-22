import {
  deleteData,
  getData,
  getSingleData,
  postData,
  putData
} from "../../plugins/api";

/**
 * 🔹 Récupérer tous les sponsors
 */
export async function allSponsors() {
  try {
    const res = await getData('/allsponsor');
    return res.data.data;
  } catch (error) {
    console.error('Erreur allSponsors:', error);
    throw error;
  }
}

/**
 * 🔹 Récupérer un sponsor par ID
 */
export async function singleSponsor(id) {
  try {
    const res = await getSingleData('/showsponsor/' + id);
    return res.data.data;
  } catch (error) {
    console.error('Erreur singleSponsor:', error);
    throw error;
  }
}

/**
 * 🔹 Ajouter un sponsor
 */
export async function postSponsor(data) {
  try {
    const res = await postData('/addsponsor', data);
    return res.data.data ?? res.data;
  } catch (error) {
    console.error('Erreur postSponsor:', error);
    throw error;
  }
}

/**
 * 🔹 Mettre à jour un sponsor
 */
export async function updateSponsor(id, data) {
  try {
    const res = await postData('/updatesponsor/' + id, data);
    return res.data.data ?? res.data;
  } catch (error) {
    console.error('Erreur updateSponsor:', error);
    throw error;
  }
}

/**
 * 🔹 Supprimer un sponsor
 */
export async function deleteSponsor(id) {
  try {
    const res = await deleteData('/deletesponsor/' + id);
    return res.data.data;
  } catch (error) {
    console.error('Erreur deleteSponsor:', error);
    throw error;
  }
}