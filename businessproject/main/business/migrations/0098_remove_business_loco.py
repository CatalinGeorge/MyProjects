# Generated by Django 2.1 on 2018-09-05 08:57

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('business', '0097_auto_20180905_0854'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='business',
            name='loco',
        ),
    ]