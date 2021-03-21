using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace SCW.Entities
{
    public class Faculty
    {
        public int ID { get; set; }

        public string Name { get; set; }

        public string Description { get; set; }

        public virtual List<FieldOfStudy> Fileds { get; set; }
    }
}
