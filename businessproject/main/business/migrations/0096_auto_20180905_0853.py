# Generated by Django 2.1 on 2018-09-05 08:53

from django.db import migrations
import places.fields


class Migration(migrations.Migration):

    dependencies = [
        ('business', '0095_auto_20180905_0851'),
    ]

    operations = [
        migrations.AlterField(
            model_name='business',
            name='loco',
            field=places.fields.PlacesField(default='152.97174', max_length=255),
        ),
    ]
