using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace SCW.Models
{
    //wyswietlane info dla klienta bez danych "wrazliwych"
    public class FieldsDTO
    {
        public int Id { get; set; }
        public string Name { get; set; }
        public string Description { get; set; }

        public string Faculty { get; set; }

        public List<SubjectDTO> Subjects { get; set; }
    }
}
